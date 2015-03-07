<?
class testiCache {

    public $today;
    public $fileLocation;



    public function __construct(){

        $this->today = date('F-d-Y');
        $this->fileLocation = 'testi/'.$this->today.'.txt';

    }

    public function check4cache(){
        if (file_exists($this->fileLocation)) {
            echo file_get_contents($this->fileLocation);
        }
        else {

            $fileContents = file_get_contents('http://www.shopperapproved.com/widgets/testimonial/6509.js');

            if (strlen($fileContents) > 0 ) {
                $this->deleteFiles();
                $start_tag = '[';
                $end_tag =']';

                $startpos = strpos($fileContents, $start_tag) + strlen($start_tag);
                    if ($startpos !== false) {
                        $endpos = strpos($fileContents, $end_tag, $startpos);
                        if ($endpos !== false) {
                            $fileCache = '['.substr($fileContents, $startpos, $endpos - $startpos).']';
                        }
                    }

            file_put_contents($this->fileLocation, $fileCache, LOCK_EX);
            echo file_get_contents($this->fileLocation);

            }
            else {
                echo file_get_contents('testi/fallback/fallback.txt');

            }
        }

    }

    private function deleteFiles() {
        $files = glob('testi/*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file))
                unlink($file); // delete file
        }

}


}
header('Content-type: text/json');
$cachee = new testiCache();
$cachee->check4cache();



/*

$fileContents = file_get_contents('http://www.shopperapproved.com/widgets/testimonial/6509.js');
$start_tag = '[';
$end_tag =']';



$startpos = strpos($fileContents, $start_tag) + strlen($start_tag);
if ($startpos !== false) {
    $endpos = strpos($fileContents, $end_tag, $startpos);
    if ($endpos !== false) {
        echo '['.substr($fileContents, $startpos, $endpos - $startpos).']';
    }
}
*/
?>
