<?php
/**
 * Highlight Text For Search 
 * @author Wakhid Wicaksono
 * @copyright Wakhid Wicaksono
 * @param $text   = Full Text or Paragraf
 * @param $search = word or sentence
 * @param $colod  = colorname or Hex Code Color
 * @return string
 * @since 2015-03-31
 * @version 1.0
 * Highlight Text ini dapat digunakan untuk memberi tanda pada kata yang sedang dicari. fungsi ini dapat
 * digabungkan dengan sistem pencari SQL LIKE dengan meletakkan keyword dan outputnya ke dalam Highlight Text
 * @example highlight('paragraf','cari','warna');
 */


function highlight($text,$search,$color='yellow')
{
	# ubah string jadi array
	$string = explode(' ', trim($text));

	if( str_word_count($search) > 1 )
	{
		$sentence = explode(' ', $search);
	}

	# hitung jumlah array yang telah dibuat
	$count  = count($string);
	$newtext= '';

	# jika yang dimasukan berupa kalimat
	if( isset($sentence) )
	{
		
		for ($i=0; $i < $count ; $i++) { 
			
			$macth = FALSE;
			# cocokan tiap kata dari kalimat yang di inputkan 
			for ($n=0; $n < count($sentence) ; $n++) { 

				/** 
				 * Pencocokan kata yang diinputkan dengan similar_text
				 * @return FLOAT 
				 */ 
				similar_text($string[$i], $sentence[$n],$per);

				# jika lebih dari 80% maka dianggap match
				if( $per > 80 )
				{
					# jika cocok maka bernilai benar
					$macth = TRUE; 
					# jika ada yang cocok pengecheckan di hentikan
					break;
				}else{
					
					# jika tidak maka bernilai salah
					$macth = FALSE;
				}
			}

			# mengembalikan Spasi yang dihapus dengan explode() sebelumnya.
			$newtext .= ' '; 

			if( $macth )
			{
				$newtext .= "<span style='background-color:{$color}'>{$string[$i]}</span>";
			}else{
				
				$newtext .= $string[$i];
			}
		}
	
	}else{

		# jika yang dimasukan berupa kata
		for ($i=0; $i < $count ; $i++) { 
			# mengembalikan Spasi yang dihapus dengan explode() sebelumnya.
			$newtext .= ' ';

			/** 
			 * Pencocokan kata yang diinputkan dengan similar_text
			 * @return FLOAT 
			 */ 
			similar_text($string[$i], $search,$per);

			# jika lebih dari 80% maka dianggap match
			if( $per > 80 )
			{
				$newtext .= "<span style='background-color:{$color}'>{$string[$i]}</span>";
			}else{
				$newtext .= $string[$i];
			}
		}
	}
	
	# menyatukan kembali text yang sudah dipecah
	return rtrim($newtext,' ');
}
?>
