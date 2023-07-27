// ダイスロール処理
function getDiceall() {
    // ロール数の取得
    var rollSelect = document.getElementById('roll');
    var roll = parseInt(rollSelect.options[rollSelect.selectedIndex].value);

    // サイコロの目の取得
    var menSelect = document.getElementById('men');
    var men = parseInt(menSelect.options[menSelect.selectedIndex].value);

    // サイコロの結果を格納する配列
    var dataset = [];
    for (var i = 0; i < roll; i++) {
        var result = Math.floor(Math.random() * men + 1);
        dataset.push(result);
    }
    document.getElementById('condiceall').innerHTML = dataset;

    // 合計値の計算
    var sum = 0;
    for (var i = 0; i < dataset.length; i++) {
        sum += dataset[i];
    }
    document.getElementById('condiceallsum').innerHTML = sum;
}



// スロットの変数と関数の定義
var sec = 100;

var $reels = [],
    stopReelFlag = [],
    reelCounts = [];

var slotFrameHeight = 0,
    slotReelsHeight = 0,
    slotReelItemHeight = 0,
    slotReelStart = 0,
    slotReelStartHeight = 0;

var Slot = {
    init: function init() {
        $reels[0] = $reels[1] = $reels[2] = null;
        stopReelFlag[0] = stopReelFlag[1] = stopReelFlag[2] = false;
        reelCounts[0] = reelCounts[1] = reelCounts[2] = 0;
    },

    start: function () {
        for (var index = 0; index < 3; index++) {
            this.animation(index);
        }
    },

    stop: function (index) {
        stopReelFlag[index] = true;
        if (stopReelFlag[0] && stopReelFlag[1] && stopReelFlag[2]) {
            document.querySelector('.btn-reset').disabled = false;
        }
    },

    resetLocationInfo: function () {
        slotFrameHeight = document.querySelector('.slot-frame').offsetHeight;
        slotReelsHeight = document.querySelector('.reels').offsetHeight;
        slotReelItemHeight = document.querySelector('.reel').offsetHeight;
        slotReelStart = 5 - 2;
        slotReelStartHeight = -slotReelsHeight;
        slotReelStartHeight = slotReelStartHeight + slotFrameHeight + ((slotReelItemHeight * 3 / 2) - (slotFrameHeight / 2));

        var reels = document.querySelectorAll('.reels');
        reels.forEach(function (reel) {
            reel.style.top = slotReelStartHeight + 'px';
        });
    },

    animation: function (index) {
        console.log('アニメーション', '開始', index);
        if (reelCounts[index] >= 5) {
            reelCounts[index] = 0;
        }

        console.log('slotReelStartHeight', slotReelStartHeight);
        console.log('reelCounts[index]', reelCounts[index]);
        console.log('slotReelsHeight', slotReelsHeight);
        console.log('top', slotReelStartHeight + (reelCounts[index] * slotReelItemHeight));

        var reels = document.querySelectorAll('.reels');
        reels[index].animate({
            'top': slotReelStartHeight + (reelCounts[index] * slotReelItemHeight)
        }, {
            duration: sec,
            easing: 'linear',
            complete: function () {
                console.log('アニメーション', '完了', index, reelCounts[index]);
                if (stopReelFlag[index]) {
                    console.log('アニメーション', 'ストップ', index, reelCounts[index]);
                    return;
                }
                reelCounts[index]++;
                Slot.animation(index);
            }
        });
    },
};

// DOM要素が完全に読み込まれた後に実行
document.addEventListener('DOMContentLoaded', function () {
    // Slotを初期化
    Slot.init();
    Slot.resetLocationInfo();

    // スロット範囲のDOM要素を取得
    var slotArea = document.getElementById('slotArea');

    // スタートボタンのクリックイベント
    document.querySelector('.btn-start').addEventListener('click', function () {
        // スタートボタンを押せないようにする
        this.disabled = true;
        // スロットの回転を開始
        Slot.start();
        // ストップボタンを押せるようにする
        document.querySelectorAll('.btn-stop').forEach(function (btn) {
            btn.disabled = false;
        });
    });

    // リセットボタンのクリックイベント
    document.querySelector('.btn-reset').addEventListener('click', function () {
        // リセットボタンを押せないようにする
        this.disabled = true;
        // スタートボタンを押せるようにする
        document.querySelector('.btn-start').disabled = false;
        // ストップボタンを押せないようにする
        document.querySelectorAll('.btn-stop').forEach(function (btn) {
            btn.disabled = true;
        });
        // スロットのリール情報を初期化
        Slot.init();
    });

    // ストップボタンのクリックイベント
    document.querySelectorAll('.btn-stop').forEach(function (btn, index) {
        btn.addEventListener('click', function () {
            // ストップボタンを押せないようにする
            this.disabled = true;
            // レールの回転を停止
            Slot.stop(index);
        });
    });

    // スロット範囲のクリックイベントリスナー
    slotArea.addEventListener('click', function () {
        // スタートボタンが無効の場合（スロットが回転中）は、ストップボタンとリセットボタンを有効にし、スロットを停止する
        if (document.querySelector('.btn-start').disabled) {
            document.querySelectorAll('.btn-stop').forEach(function (btn) {
                btn.disabled = false;
            });
            document.querySelector('.btn-reset').disabled = false;
            // スロットのリールを停止
            for (var index = 0; index < 3; index++) {
                Slot.stop(index);
            }
        } else {
            // スタートボタンが有効の場合（スロットが停止中）は、スタートボタンを無効にし、ストップボタンとリセットボタンを有効にする
            document.querySelector('.btn-start').disabled = true;
            document.querySelectorAll('.btn-stop').forEach(function (btn) {
                btn.disabled = false;
            });
            document.querySelector('.btn-reset').disabled = false;
            // スロットのリールを開始
            for (var index = 0; index < 3; index++) {
                Slot.animation(index);
            }
        }
    });
});