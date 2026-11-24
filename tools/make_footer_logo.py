"""Create a footer-friendly logo: transparent bg, light text for navy footer."""
from PIL import Image

src = r"assets/images/godavari-logo.png"
out = r"assets/images/godavari-logo-footer.png"

img = Image.open(src).convert("RGBA")
pixels = img.load()
w, h = img.size

for y in range(h):
    for x in range(w):
        r, g, b, a = pixels[x, y]
        if a < 20:
            continue

        # Detect navy / dark blue text (company name + dark parts of mark)
        # Keep olive green "Godavari" and sky-blue ring as-is.
        is_olive = g > r + 20 and g > b and r < 160 and b < 120
        is_sky = b > 180 and g > 100 and r < 80 and b > r + 80
        is_navyish = b >= r and b >= g - 10 and r < 90 and b > 90 and (r + g + b) < 340

        if is_olive or is_sky:
            continue

        # Convert navy/dark blue and grey divider/text to light colors for dark footer
        if is_navyish or (r < 100 and g < 100 and b < 130 and a > 80):
            # Preserve some blue character for the GS mark, bleach company text more
            # Lower third of image is mostly company name + line
            if y > int(h * 0.62):
                pixels[x, y] = (230, 240, 255, a)  # light text
            else:
                # Symbol navy -> slightly lighter navy/white blend for contrast
                pixels[x, y] = (min(255, r + 40), min(255, g + 50), min(255, b + 30), a)

img.save(out, "PNG")
print("saved", out, img.size)
