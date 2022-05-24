# Arduino ESP32 複数バージョン利用方法

Arduino IDEでESP32開発環境を複数のバージョンを共存させる場合に利用するjsonファイルです。

公式のファイルを編集しており、別ディレクトリにインストールすることにより、複数のバージョンを共存させています。インストールされるファイルには手を加えていません。

![](img/top.png)

バージョンの選択はボード選択で行います。

## バージョン対応表

| ESP-IDF | arduino-esp32     | M5Stack           | platform-espressif32                                                                                       |
|---------|-------------------|-------------------|------------------------------------------------------------------------------------------------------------|
| 4.4     | 2.0.3(2022/03/30) | 2.0.3(2022/05/12) | 4.3.0(2022/5/21)                                                                                           |
| 4.4     | 2.0.2(2021/12/23) | 2.0.2(2022/01/04) | 4.2.0(2022/4/29)                                                                                           |
| 4.4     | 2.0.1(2021/11/09) | 2.0.1(2021/12/20) | 4.1.0(2022/4/22)                                                                                           |
| 4.4     | 2.0.0(2021/08/31) | 2.0.0(2021/10/30) | 4.0.0(2022/4/22)                                                                                           |
| 3.3.5   | 1.0.6(2021/03/26) |                   | 3.5.0(2022/1/28)<br />3.4.0(2021/11/12)<br />3.3.2(2021/8/31)<br />3.3.1(2021/7/27)<br   />3.3.0(2021/6/30)<br />3.2.1(2021/5/31)<br />3.2.0(2021/3/29) |
| 3.3     | 1.0.5(2021/02/23) |                   | 3.1.1(2021/3/19)<br />3.1.0(2021/2/26)                                                                     |
| 3.2     | 1.0.4(2019/10/02) | 1.0.9(2021/8/24)  | 3.0.0(2021/1/30)<br />2.1.0(2020/12/2)                                                                     |

## Arduino IDEにjsonを登録

![](img/add_json.png)

Arduino IDEの追加のボードマネージャーに必要なバージョンのjsonを追加します。

```
https://raw.githubusercontent.com/espressif/arduino-esp32/gh-pages/package_esp32_index.json
https://m5stack.oss-cn-shenzhen.aliyuncs.com/resource/arduino/package_m5stack_index.json

https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_esp32_index_1.0.4.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_esp32_index_1.0.5.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_esp32_index_1.0.6.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_esp32_index_2.0.0.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_esp32_index_2.0.1.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_esp32_index_2.0.2.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_esp32_index_2.0.3.json

https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_m5stack_index_1.0.6.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_m5stack_index_1.0.7.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_m5stack_index_1.0.8.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_m5stack_index_1.0.9.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_m5stack_index_2.0.0.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_m5stack_index_2.0.1.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_m5stack_index_2.0.2.json
https://raw.githubusercontent.com/tanakamasayuki/esp32-arduino-test/master/package_m5stack_index_2.0.3.json
```

## ボードマネージャでインストール

![](img/esp32.png)
![](img/m5stack.png)

バージョン別に表示されますので個別にインストールします。

## ボード選択メニューの名前を修正

![](img/noname.png)

追加した直後ですとどのバージョンかがわからないので修正します。

```
C:\Users\%USERNAME%\AppData\Local\Arduino15\packages
```

Windowsの場合上記のフォルダを開くとバージョン別のボードが並んでいます。

```
C:\Users\%USERNAME%\AppData\Local\Arduino15\packages\esp32_2.0.0\hardware\esp32\2.0.0\platform.txt
```

ESP32 for Arduino 2.0.0の場合には上記にplatform.txtがあります。

```
- name=ESP32 Arduino
+ name=ESP32 Arduino 2.0.0
```

一行目がボード選択で表示されるグループ名なので、ここをわかりやすい名前に変更します。

## PlatformIOのplatformio.ini例
```
[env:m5stack-basic]
platform = espressif32@3.3.2 ;ESP-IDF(3.3.5), Arduino(1.0.6)
framework = arduino
board = m5stack-core-esp32
lib_ldf_mode = deep
monitor_speed = 115200
build_flags = -DCORE_DEBUG_LEVEL=0 ;0:None, 1:Error, 2:Warn, 3:Info, 4:Debug, 5:Verbose
;upload_port = COM3
;board_build.partitions = no_ota.csv ;https://github.com/espressif/arduino-esp32/tree/master/tools/partitions
lib_deps = 
  m5stack/M5Stack
```
