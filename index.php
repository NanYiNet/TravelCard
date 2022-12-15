<?php
define('config_path', dirname(__FILE__).'/');
$Nathan = require_once config_path.'/Nathan/NathanWebSite.php';
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Nathan['webname']; ?></title>
    <meta name="description" content="<?php echo $Nathan['description']; ?>">
    <meta name="keyword" content="<?php echo $Nathan['keyword']; ?>">
    <meta name="author" content="Nathan">
    <link rel="shortcut icon" href="./Static/image/arrow-compressed.png" type="image/x-icon">
    <link rel="stylesheet" href="./Static/css/Nathan.css">
</head>
<body>
<div id="app">
    <div class="container">
        <div>
        </div>
        <div class="title">
            <h1 style="letter-spacing: 2.5px; text-indent: 2.5px;">{{ card.title }}</h1>
            <p style="margin-top: 5px;">{{ card.subtitle }}</p>
        </div>
        <div class="card">
            <div>
                <div style="background-color: #CFEEDF; height: 20px;"></div>
                <div style="background-color: #CFEEDF;
                                height: 40px;
                                position: relative;
                                margin: 0 auto;
                                color: #00A766;
                                border-bottom-left-radius: 24px;
                                border-bottom-right-radius: 24px;
                                top: -20px;
                                line-height: 40px;
                                display: inline-block;
                                padding: 0 40px;
                                letter-spacing: 0.8px;">
                    请收下绿色行程卡
                </div>
            </div>
            <div>
                <p style="font-weight: bold; font-size: 16px; margin-top: 18px;">
                    {{ card.phone }}的动态行程卡
                </p>
                <p style="font-size: 18px; color: grey; margin-top: 12px;">
                    {{ card.time }}
                </p>
            </div>
            <div style="display: grid; place-items: center;">
                <img src="./Static/image/arrow-compressed.png" style="width: 45%;" class="animate" />
            </div>
            <div>
                <div
                        style="border-top: 1px solid #E3E3E3; margin: 0 20px; padding-top: 8px; color: #91919B; padding-bottom: 12px;">
                    您于 {{ card.timeSpan }} 年到达或途径：<span style="font-weight: bold; color: black;">{{ card.location
                            }}</span>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div style="margin: 12px 10%;">
                2022年12月13日0时起，正式下线“通信行程卡”服务，“通信行程卡”短信、网页、微信小程序、支付宝小程序、APP等查询渠道将同步下线。
            </div>
            <div>
                ———— 三年了，再见 ————
            </div>
            <div style="margin-top: 8px;">
                <p>2020.02.13 - 2022.12.13</p>
            </div>
        </div>
    </div>

    <div v-if="showSetting" class="cover grey-cover"></div>
    <div v-else class="cover" @click="toggleSetting"></div>
    <div v-if="showSetting" class="control-panel-container" @click="toggleSetting">
        <div class="control-panel" @click.stop>
            <div style="position: relative; text-align: initial; padding: 16px;">
                <div style="font-size: 40px;
                                position: absolute;
                                right: 5px;
                                top: 5px;
                                line-height: 32px;
                                width: 32px;
                                height: 32px;
                                cursor: pointer;" @click="toggleSetting">×</div>
                <div style="display: grid;">
                    <div style="font-weight: bold; margin-bottom: 20px;">设置</div>
                    <div style="display: grid; grid-template-columns: auto 1fr 60px; gap: 10px; font-size: 14px;">
                        <template v-for="item in setting">
                            <div class="setting-title">{{ item.name }}</div>
                            <div class="setting-input" :style="item.more ? {} : { 'grid-column': 'span 2' }">
                                    <textarea v-if="item.textarea" v-model="card[item.key]" :maxlength="item.maxlength"
                                              style="width: 100%; resize: none;" rows="3"></textarea>
                                <input v-else :placeholder="item.name" :maxlength="item.maxlength"
                                       v-model="card[item.key]" />
                            </div>
                            <div class="setting-reset" v-if="item.more">
                                <button style="width: 100%;"
                                        @click="card[item.key] = getRandom(item.more, card[item.key])">换一个</button>
                            </div>
                        </template>
                    </div>
                    <div style="font-size: 13px; color: grey;">
                        <p><b>说明：</b></p>
                        <p style="text-indent: 5px;">1. 配置好后，您可以截图保存</p>
                        <p style="text-indent: 5px;">2. 点击屏幕可以再次打开本窗口</p>
                        <p style="text-indent: 5px;">3. 以上配置在刷新后将恢复默认</p>
                    </div>
                    <button style="margin-top: 10px;" @click="toggleSetting">完成</button>
                </div>
            </div>
        </div>
    </div>
    <div class="footbar" :class="{ 'footbar-setting': showSetting }">
        <p :style="showSetting ? {} : { color: '#cfeedf' }">
            * 本页面仅作纪念，无实际意义，不得用于防疫等相关场景
        </p>
        <p v-if="showSetting">
            本页面由 Nathan 制作并开源<br>
            欢迎关注：
            <a target="_blank" href="http://www.nanyinet.com/">南逸博客</a>
        </p>
    </div>
</div>
<script src="./Static/js/vue.min.js"></script>
<script src="./Static/js/Nathan.js"></script>
</body>
</html>