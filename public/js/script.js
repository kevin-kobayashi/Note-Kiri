// ダイスロール処理
// function getDiceall() {
//     // ロール数の取得
//     var rollSelect = document.getElementById('roll');
//     var roll = parseInt(rollSelect.options[rollSelect.selectedIndex].value);

//     // サイコロの目の取得
//     var menSelect = document.getElementById('men');
//     var men = parseInt(menSelect.options[menSelect.selectedIndex].value);

//     // サイコロの結果を格納する配列
//     var dataset = [];
//     for (var i = 0; i < roll; i++) {
//         var result = Math.floor(Math.random() * men + 1);
//         dataset.push(result);
//     }
//     document.getElementById('condiceall').innerHTML = dataset;

//     // 合計値の計算
//     var sum = 0;
//     for (var i = 0; i < dataset.length; i++) {
//         sum += dataset[i];
//     }
//     document.getElementById('condiceallsum').innerHTML = sum;
// }


// スロットの変数と関数の定義
(function (global) {
    "use strict";

    /*
     * スロットのリール回転速度(実行毎秒数)
     */
    var sec = 50;

    /*
     * スロットのリール情報
     * ・スロットのリールelement
     * ・スロットのリール停止フラグ
     * ・スロットのリール回転数
     */
    var $reels = [],
        stopReelFlag = [],
        reelCounts = [];

    /*
     * 位置情報
     */
    var slotFrameHeight = 0,
        slotReelsHeight = 0,
        slotReelItemHeight = 0,
        slotReelStart = 0,
        slotReelStartHeight = 0;

    /**
     * スロット
     */
    var Slot = {
        /**
         * 初期化処理
         */
        init: function init() {
            $reels[0] = $reels[1] = $reels[2] = null;
            stopReelFlag[0] = stopReelFlag[1] = stopReelFlag[2] = false;
            reelCounts[0] = reelCounts[1] = reelCounts[2] = 0;
        },
        /**
         * スタートボタンのクリックイベント
         */
        start: function () {
            for (var index = 0; index < 3; index++) {
                Slot.animation(index);
            }
        },
        /**
         * ストップボタンのクリックイベント
         */
        stop: function (index) {
            stopReelFlag[index] = true;
            if (stopReelFlag[0] && stopReelFlag[1] && stopReelFlag[2]) {
                // 全リール停止したらリセットボタンを押下できるようにする
                $('.btn-reset').attr('disabled', false);
            }
        },
        /**
         * 位置情報の初期化処理
         */
        resetLocationInfo: function () {
            slotFrameHeight = $('.slot-frame').outerHeight();
            slotReelsHeight = $('.reels').eq(0).outerHeight();
            slotReelItemHeight = $('.reel').eq(0).outerHeight();
            slotReelStart = 7 - 2;
            // リールの上下は、半分だけ表示させるための位置調整
            slotReelStartHeight = -slotReelsHeight;
            slotReelStartHeight = slotReelStartHeight + slotFrameHeight + ((slotReelItemHeight * 3 / 2) - (slotFrameHeight / 2));

            $('.reels').css({
                'top': slotReelStartHeight
            });
        },
        /**
         * スロットの回転アニメーション
         */
        animation: function (index) {
            console.log('アニメーション', '開始', index);
            if (reelCounts[index] >= 8) {
                reelCounts[index] = 0;
            }

            console.log('slotReelStartHeight', slotReelStartHeight);
            console.log('reelCounts[index]', reelCounts[index]);
            console.log('slotReelsHeight', slotReelsHeight);
            console.log('top', slotReelStartHeight + (reelCounts[index] * slotReelItemHeight));

            $('.reels').eq(index).animate({
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
                    // 移動階数をカウント
                    reelCounts[index]++;
                    // スロット回転のアニメーションを実行する
                    Slot.animation(index);
                }
            });
        },
    };

    global.Slot = Slot;

})((this || 0).self || global);

/**
 * 読み込み後
 */
$(document).ready(function () {

    /*
     * スロットの初期化処理を実行
     */
    Slot.init();
    Slot.resetLocationInfo();

    /**
     * スタートボタンのクリックイベント
     */
    $('.btn-start').click(function () {
        // スタートボタンを押せないようにする
        $(this).attr('disabled', true);
        // スロットの回転を開始
        Slot.start();
        // ストップボタンを押せるようにする
        $('.btn-stop').attr('disabled', false);
    });

    /**
     * リセットボタンのクリックイベント
     */
    $('.btn-reset').click(function () {
        // リセットボタンを押せないようにする
        $(this).attr('disabled', true);
        // スタートボタンを押せるようにする
        $('.btn-start').attr('disabled', false);
        // ストップボタンを押せないようにする
        $('.btn-stop').attr('disabled', true);
        // スロットのリール情報を初期化
        Slot.init();
    });

    /**
     * ストップボタンのクリックイベント
     */
    $('.btn-stop').click(function () {
        // ストップボタンを押せないようにする
        $(this).attr('disabled', true);
        // レールの回転を停止
        Slot.stop($(this).attr('data-val'));
    });
});


// 共有リンク一覧モーダル
// モーダルが表示される前にAjaxリクエストを行う
// $('#sharedLinksModal').on('show.bs.modal', function () {
//     $.ajax({
//         url: "{{ route('shared-links') }}", // 共有リンク一覧を取得するルートのURL
//         type: "GET",
//         dataType: "json",
//         success: function (data) {
//             var sharedLinksList = $('#sharedLinksList');
//             sharedLinksList.empty(); // 一旦リストを空にする

//             data.forEach(function (link) {
//                 var listItem = '<li>' +
//                     '<a href="' + link.shared_url + '">' +
//                     '<i class="bi bi-link-45deg"></i>' +
//                     link.article_title + '</a>' +
//                     '<spam class="ms-2">' + link.shared_at + '</spam>' +
//                     '<a class="ms-auto" href="' + link.article_url + '">' +
//                     '<i class="bi bi-chat-left"></i>' + '</a>' +
//                     '</li>';
//                 sharedLinksList.append(listItem);
//             });
//         },
//         error: function (error) {
//             console.log(error);
//         }
//     });
// });