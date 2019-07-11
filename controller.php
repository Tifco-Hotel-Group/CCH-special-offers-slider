<?php  namespace Application\Block\Specialofferslider;

defined("C5_EXECUTE") or die("Access Denied.");

use Concrete\Core\Block\BlockController;
use Core;
use File;
use Page;

class Controller extends BlockController
{
    public $helpers = array('form');
    public $btFieldsRequired = array('imageandlink', 'atinternettracking', 'offertext');
    protected $btExportFileColumns = array('imageandlink');
    protected $btTable = 'btSpecialofferslider';
    protected $btInterfaceWidth = 650;
    protected $btInterfaceHeight = 650;
    protected $btIgnorePageThemeGridFrameworkContainer = false;
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btCacheBlockOutputLifetime = 0;
    protected $pkg = false;
    
    public function getBlockTypeDescription()
    {
        return t("Special Offer Slider");
    }

    public function getBlockTypeName()
    {
        return t("Special Offer Slider");
    }

    public function getSearchableContent()
    {
        $content = array();
        $content[] = $this->atinternettracking;
        $content[] = $this->offertext;
        return implode(" ", $content);
    }

    public function view()
    {
        
        if ($this->imageandlink && ($f = File::getByID($this->imageandlink)) && is_object($f)) {
            $this->set("imageandlink", $f);
        } else {
            $this->set("imageandlink", false);
        }
    }

    public function add()
    {
        $this->addEdit();
    }

    public function edit()
    {
        $this->addEdit();
    }

    protected function addEdit()
    {
        $this->requireAsset('core/file-manager');
        $this->set('btFieldsRequired', $this->btFieldsRequired);
    }

    public function validate($args)
    {
        $e = Core::make("helper/validation/error");
        if (in_array("imageandlink", $this->btFieldsRequired) && (trim($args["imageandlink"]) == "" || !is_object(File::getByID($args["imageandlink"])))) {
            $e->add(t("The %s field is required.", t("Image and offer link")));
        }elseif (is_object(File::getByID($args["imageandlink"])) && (trim($args["imageandlink_url"]) == "" || !filter_var($args["imageandlink_url"], FILTER_VALIDATE_URL))) {
              $e->add(t("The %s URL field does not have a valid URL.", t("Image and offer link")));
        }
        if (in_array("atinternettracking", $this->btFieldsRequired) && (trim($args["atinternettracking"]) == "")) {
            $e->add(t("The %s field is required.", t("At Internet tag")));
        }
        if (in_array("offertext", $this->btFieldsRequired) && (trim($args["offertext"]) == "")) {
            $e->add(t("The %s field is required.", t("Offer Text")));
        }
        return $e;
    }

    public function composer()
    {
        $this->edit();
    }
}