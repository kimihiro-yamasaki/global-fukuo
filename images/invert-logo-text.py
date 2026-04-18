"""
Hobby Select ロゴの暗い文字部分だけを白に変換するスクリプト。
カラー要素（赤い太陽・オレンジの靴・桜・赤タグ）は保持する。

使い方:
    python invert-logo-text.py
"""
from PIL import Image
import colorsys
import os

SRC = os.path.join(os.path.dirname(__file__), "hobby-select-logo.png")
DST = os.path.join(os.path.dirname(__file__), "hobby-select-logo-white.png")

# しきい値: 「暗いグレー / 黒」と判定する条件
LIGHTNESS_MAX = 0.45   # この明度より暗ければ対象
SATURATION_MAX = 0.25  # この彩度より低ければ対象（=ほぼ無彩色）


def main() -> None:
    img = Image.open(SRC).convert("RGBA")
    pixels = img.load()
    w, h = img.size
    converted = 0

    for y in range(h):
        for x in range(w):
            r, g, b, a = pixels[x, y]
            if a == 0:
                continue
            # RGB → HLS
            hue, lightness, saturation = colorsys.rgb_to_hls(r / 255, g / 255, b / 255)
            # 暗くて無彩色（=黒い文字や黒い輪郭）なら明度を反転
            if lightness < LIGHTNESS_MAX and saturation < SATURATION_MAX:
                new_l = 1.0 - lightness
                nr, ng, nb = colorsys.hls_to_rgb(hue, new_l, saturation)
                pixels[x, y] = (int(nr * 255), int(ng * 255), int(nb * 255), a)
                converted += 1

    img.save(DST)
    total = w * h
    print(f"変換完了: {DST}")
    print(f"  対象ピクセル: {converted:,} / {total:,} ({converted / total * 100:.1f}%)")


if __name__ == "__main__":
    main()
