"""Remove solid background from Godavari logo; keep brand colors intact."""
from PIL import Image

src = r"assets/images/godavari-logo-source.png"
out = r"assets/images/godavari-logo.png"
preview = r"assets/images/godavari-logo-on-white.png"

img = Image.open(src).convert("RGBA")
pixels = img.load()
w, h = img.size


def is_background(r, g, b, a):
    """Treat near-black / near-white / already-transparent pixels as background."""
    if a < 20:
        return True, 0
    luminance = (r + g + b) / 3.0
    # Near black (common when this asset is viewed on dark pages)
    if luminance <= 30 and max(abs(r - g), abs(g - b), abs(r - b)) < 25:
        return True, 0
    # Near white / light gray fill
    if luminance >= 235 and max(abs(r - g), abs(g - b), abs(r - b)) < 20:
        return True, 0
    # Soft edge for dark bg
    if luminance < 50 and max(abs(r - g), abs(g - b), abs(r - b)) < 30:
        t = (luminance - 30) / 20
        return True, int(max(0, min(1, t)) * a)
    # Soft edge for light bg
    if luminance > 215 and max(abs(r - g), abs(g - b), abs(r - b)) < 25:
        t = (235 - luminance) / 20
        return True, int(max(0, min(1, t)) * a)
    return False, a


for y in range(h):
    for x in range(w):
        r, g, b, a = pixels[x, y]
        bg, new_a = is_background(r, g, b, a)
        if bg:
            pixels[x, y] = (r, g, b, new_a)

# Flood-fill from corners to clear any remaining backdrop connected to edges
visited = [[False] * w for _ in range(h)]
stack = [(0, 0), (w - 1, 0), (0, h - 1), (w - 1, h - 1)]
while stack:
    x, y = stack.pop()
    if x < 0 or y < 0 or x >= w or y >= h or visited[y][x]:
        continue
    visited[y][x] = True
    r, g, b, a = pixels[x, y]
    lum = (r + g + b) / 3.0
    # Only continue through transparent / near-backdrop pixels
    if a > 40 and not (lum <= 40 or lum >= 230):
        continue
    if a > 0:
        pixels[x, y] = (r, g, b, 0)
    stack.extend([(x + 1, y), (x - 1, y), (x, y + 1), (x, y - 1)])

img.save(out, "PNG")

board = Image.new("RGBA", img.size, (255, 255, 255, 255))
board.alpha_composite(img)
board.convert("RGB").save(preview, "PNG")
print("saved", out)
print("preview", preview)
print("size", img.size)
