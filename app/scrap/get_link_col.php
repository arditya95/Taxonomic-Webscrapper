<?php
// header('Content-Type: application/json');

include_once "../../setting/koneksi.php";
include_once "../../setting/simple_html_dom.php";
set_time_limit(0);
error_reporting(0);
$start = microtime(true);
$count=0;

$url='http://www.catalogueoflife.org/col/browse/tree/fetch/taxa?id=0&start=0';
$html = file_get_contents($url);
$data = json_decode($html,true);
//============================================================================
// TODO: KINGDOM
$items = $data['items'];
foreach ($items as $item) {
    // TODO: ID
    // echo "[" . $item['id'] ."] => ";

    // TODO: Bagian Cek Type/Taxon
    if (!empty( $item['type'])) {
      // echo "[" . $item['type'] ."] => ";
    }else {
      // echo "[" . "kingdom" . "] => ";
    }

    // TODO: Nama
    // echo "[" . $item['name'] ."] => ";

    // TODO: Bagian Cek URL
    if (!empty($item['url'])) {
      // echo "[" . $item['url'] . "]<br>";
    }else {
      // echo "[" . "URL Tidak tersedia" . "]<br>";
    }

    // TODO: Pengecekan Animalia dan Plantae
    if ($item['name']=="Animalia" || $item['name']=="Plantae") {
      //============================================================================
      // TODO: PHYLUM
          $id=$item['id'];
          $url2="http://www.catalogueoflife.org/col/browse/tree/fetch/taxa?id=$id&start=0";
          $html2 = file_get_contents($url2);
          $data2 = json_decode($html2,true);
          $items2 = $data2['items'];
          foreach ($items2 as $item2) {
            // TODO: ID
            // echo "[" . $item2['id'] ."] => ";
            // TODO: Bagian Cek Type/Taxon
            if (!empty( $item2['type'])) {
              // echo "[" . $item2['type'] ."] => ";
            }else {
              // echo "[" . "kingdom" . "] => ";
            }
            // TODO: Nama
            // echo "[" . $item2['name'] ."] => ";
            // TODO: Bagian Cek URL
            if (!empty($item2['url'])) {
              // echo "[" . $item2['url'] . "]<br>";
            }else {
              // echo "[" . "URL Tidak tersedia" . "]<br>";
            }
      //============================================================================
      // TODO: CLASS
                $id2=$item2['id'];
                $url3="http://www.catalogueoflife.org/col/browse/tree/fetch/taxa?id=$id2&start=0";
                $html3 = file_get_contents($url3);
                $data3 = json_decode($html3,true);
                $items3 = $data3['items'];
                foreach ($items3 as $item3) {
                  // TODO: ID
                  // echo "[" . $item3['id'] ."] => ";
                  // TODO: Bagian Cek Type/Taxon
                  if (!empty( $item3['type'])) {
                    // echo "[" . $item3['type'] ."] => ";
                  }else {
                    // echo "[" . "kingdom" . "] => ";
                  }
                  // TODO: Nama
                  // echo "[" . $item3['name'] ."] => ";
                  // TODO: Bagian Cek URL
                  if (!empty($item3['url'])) {
                    // echo "[" . $item3['url'] . "]<br>";
                  }else {
                    // echo "[" . "URL Tidak tersedia" . "]<br>";
                  }
                  //============================================================================
                  // TODO: ORDO
                            $id3=$item3['id'];
                            $url4="http://www.catalogueoflife.org/col/browse/tree/fetch/taxa?id=$id3&start=0";
                            $html4 = file_get_contents($url4);
                            $data4 = json_decode($html4,true);
                            $items4 = $data4['items'];
                            foreach ($items4 as $item4) {
                              // TODO: ID
                              // echo "[" . $item4['id'] ."] => ";
                              // TODO: Bagian Cek Type/Taxon
                              if (!empty( $item4['type'])) {
                                // echo "[" . $item4['type'] ."] => ";
                              }else {
                                // echo "[" . "kingdom" . "] => ";
                              }
                              // TODO: Nama
                              // echo "[" . $item4['name'] ."] => ";
                              // TODO: Bagian Cek URL
                              if (!empty($item4['url'])) {
                                // echo "[" . $item4['url'] . "]<br>";
                              }else {
                                // echo "[" . "URL Tidak tersedia" . "]<br>";
                              }
                              //============================================================================
                              // TODO: FAMILY
                                        $id4=$item4['id'];
                                        $url5="http://www.catalogueoflife.org/col/browse/tree/fetch/taxa?id=$id4&start=0";
                                        $html5 = file_get_contents($url5);
                                        $data5 = json_decode($html5,true);
                                        $items5 = $data5['items'];
                                        foreach ($items5 as $item5) {
                                          // TODO: ID
                                          // echo "[" . $item5['id'] ."] => ";
                                          // TODO: Bagian Cek Type/Taxon
                                          if (!empty( $item5['type'])) {
                                            // echo "[" . $item5['type'] ."] => ";
                                          }else {
                                            // echo "[" . "kingdom" . "] => ";
                                          }
                                          // TODO: Nama
                                          // echo "[" . $item5['name'] ."] => ";
                                          // TODO: Bagian Cek URL
                                          if (!empty($item5['url'])) {
                                            // echo "[" . $item5['url'] . "]<br>";
                                          }else {
                                            // echo "[" . "URL Tidak tersedia" . "]<br>";
                                          }
                                          //============================================================================
                                          // TODO: GENUS
                                                    $id5=$item5['id'];
                                                    $url6="http://www.catalogueoflife.org/col/browse/tree/fetch/taxa?id=$id5&start=0";
                                                    $html6 = file_get_contents($url6);
                                                    $data6 = json_decode($html6,true);
                                                    $items6 = $data6['items'];
                                                    foreach ($items6 as $item6) {
                                                      // TODO: ID
                                                      // echo "[" . $item6['id'] ."] => ";
                                                      // TODO: Bagian Cek Type/Taxon
                                                      if (!empty( $item6['type'])) {
                                                        // echo "[" . $item6['type'] ."] => ";
                                                      }else {
                                                        // echo "[" . "kingdom" . "] => ";
                                                      }
                                                      // TODO: Nama
                                                      // echo "[" . $item6['name'] ."] => ";
                                                      // TODO: Bagian Cek URL
                                                      if (!empty($item6['url'])) {
                                                        // echo "[" . $item6['url'] . "]<br>";
                                                      }else {
                                                        // echo "[" . "URL Tidak tersedia" . "]<br>";
                                                      }
                                                      //============================================================================
                                                      // TODO: SPECIES
                                                                $id6=$item6['id'];
                                                                $url7="http://www.catalogueoflife.org/col/browse/tree/fetch/taxa?id=$id6&start=0";
                                                                $html7 = file_get_contents($url7);
                                                                $data7 = json_decode($html7,true);
                                                                $items7 = $data7['items'];
                                                                foreach ($items7 as $item7) {
                                                                  // TODO: ID
                                                                  // echo "[" . $item7['id'] ."] => ";
                                                                  // TODO: Bagian Cek Type/Taxon
                                                                  if (!empty( $item7['type'])) {
                                                                    // echo "[" . $item7['type'] ."] => ";
                                                                  }else {
                                                                    // echo "[" . "kingdom" . "] => ";
                                                                  }
                                                                  // TODO: Nama
                                                                  // echo "[" . $item7['name'] ."] => ";
                                                                  // TODO: Bagian Cek URL
                                                                  if (!empty($item7['url'])) {
                                                                    $url="http://www.catalogueoflife.org" . $item7['url'];
                                                                    // echo "[" . $url . "]<br>";
                                                                    $count++;
                                                                    if ($count<=200) {
                                                                      $query = "INSERT INTO tb_link (info) VALUES ('$url')";
                                                                      mysqli_query($con,$query);
                                                                    }
                                                                    // TODO: pengejekan jika data sudah 200
                                                                    else{
                                                                      $time_elapsed_secs = microtime(true) - $start;
                                                                      $duration = $time_elapsed_secs;
                                                                      $message = 'Proses Selesai dengan waktu ' . $duration . ' detik & ' . $count .' Data yang berhasil disimpan';
                                                                          echo "<SCRIPT type='text/javascript'> //not showing me this
                                                                              alert('$message');
                                                                              window.location.replace(\"../../index.php\");
                                                                          </SCRIPT>";
                                                                    }
                                                                  }else {
                                                                    // echo "[" . "URL Tidak tersedia" . "]<br>";
                                                                  }

                                                                }
                                                    }
                                        }
                            }
                }
          }
    }
//============================================================================
}
// // mysql_close($con);
// $time_elapsed_secs = microtime(true) - $start;
// $duration = $time_elapsed_secs;
// // $hours = (int)($duration/60/60);
// // $minutes = (int)($duration/60)-$hours*60;
// // $seconds = $duration-$hours*60*60-$minutes*60;
// // $sec = number_format((float)$seconds, 2, '.', '');
// // echo "Total execution time in seconds : " . $time_elapsed_secs;
// $message = 'Proses Selesai dengan waktu ' . $duration . ' detik & ' . $count .' Data yang berhasil disimpan';
//     echo "<SCRIPT type='text/javascript'> //not showing me this
//         alert('$message');
//         window.location.replace(\"../../index.php\");
//     </SCRIPT>";
?>
