# highlight-text-php
Highlight Text ini dapat digunakan untuk memberi tanda pada kata yang sedang dicari. fungsi ini dapat digabungkan dengan sistem pencari SQL LIKE dengan meletakkan keyword dan outputnya ke dalam Highlight Text

# Requirment :
using PHP 5 above


# example

$text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dolorum eveniet hic aspernatur iusto accusantium sint explicabo, alias assumenda earum corporis expedita, vitae fugiat dicta qui voluptas! Hic, unde non!';
$search = 'Lorem ipsum dolor amet';
echo highlight($text,$search);
