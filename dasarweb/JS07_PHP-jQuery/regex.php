<?php
$pattern = '/[a-z]/';
$text = 'This is a Sample Text.';

if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan!";
} else {
    echo "Tidak ada huruf kecil!";
}
echo "<br>";
echo "<br>";

$pattern = '/[0-9]+/';
$text = 'There are 123 apples.';

if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}
echo "<br>";
echo "<br>";

$pattern = '/apple/';
$replacement = 'banana';
$text = 'I like apple pie.';

$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text;

echo "<br>";
echo "<br>";
$pattern = '/go*d/';
$text = 'god is good.';

if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}

echo "<br>";
echo "<br>";
$pattern = '/go?d/';
$texts = ['god is good.', 'gd is strange.', 'good', 'going away'];

foreach ($texts as $t) {
    if (preg_match($pattern, $t, $m)) {
        echo "Text: \"$t\" -> Matched: " . $m[0] . "<br>";
    } else {
        echo "Text: \"$t\" -> No match<br>";
    }
}
echo "<br>";
echo "<br>";
$pattern = '/go{2,4}d/';
$texts = ['god', 'good', 'goood', 'goooood', 'gooood day'];

foreach ($texts as $t) {
    if (preg_match($pattern, $t, $m)) {
        echo "Text: \"$t\" -> Matched: " . $m[0] . "<br>";
    } else {
        echo "Text: \"$t\" -> No match<br>";
    }
}
?>