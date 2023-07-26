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
