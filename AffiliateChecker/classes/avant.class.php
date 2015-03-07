<?
class avant {
    public $xml;
    public $id;
    public function checkTran($id) {
        $xml = simplexml_load_file("https://www.avantlink.com/api.php?module=MerchantReport&auth_key=XXXXXXXXXXXXXX&merchant_id=XXXXXXX&report_id=19&output=xml&transaction_id=".$id);
        if (count($xml->children()) != 0) {
            return True;
        }
    }
}