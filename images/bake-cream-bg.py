"""
Hobby Select ロゴの透過部分をクリーム色で塗りつぶしたバージョンを生成。
"""
from PIL import Image
import os

SRC = os.path.join(os.path.dirname(__file__), "hobby-select-logo.png")
DST = os.path.join(os.path.dirname(__file__), "hobby-select-logo-cream.png")
CREAM = (245, 240, 234)  # #F5F0EA — ブランドのアースカラー

img = Image.open(SRC).convert("RGBA")
bg = Image.new("RGBA", img.size, CREAM + (255,))
bg.paste(img, mask=img.split()[3])
bg.convert("RGB").save(DST, "PNG", optimize=True)
print(f"生成: {DST}")
