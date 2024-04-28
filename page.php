<?php



abstract class page{
    const ACTION = "action";
    const CREATE_VIEW = "create_view";
    const EDIT_VIEW = "edit_view";
    const ADD_NEW = "add_new";
    const EDIT = "edit";
    const DELETE = "delete";

    private string $title;
    private string $table_name;

    #Get the value of title
    public function getTitle(){
        return $this->title;
    }

    #Get the value of table_name 
    public function getTable_name(){
        return $this->table_name;
    }
    
    public function __construct(){
        $this -> title = $this -> passTitle();
        $this -> table_name = $this -> passTableName();
    }

    protected static function openConnection(): ? PDO{
        try{
            return new PDO("mysql:host=localhost;dbname=pzsi", "root");
        }
        catch(PDOException $exp){
            echo($exp -> getMessage());
            return null;
        }
    }

    protected function generateHeader() : string{
        return '<!DOCTYPE html>
        <html>
        
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>
                Internal Events
            </title>
            <link rel="stylesheet" href="css/bootstrap.min.css" />
            <link
                href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
                rel="stylesheet">
        </head>
        
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Internal Events - Create</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form method="POST">
                            <button class="btn btn-primary" name="'.self::ACTION.'" value="'.self::CREATE_VIEW.'"> Create new </button>
                            <button class="btn btn-primary">All</button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>';
    }

    protected function generateFooter() : string{
        return '    <script src="js/bootstrap.min.js"></script>
        </body>
        </html>';
    }

    abstract protected function passTitle(): string;
    abstract protected function passTableName(): string;
    abstract protected function generateViewAll() : string;
    abstract protected function generateViewAdd() : string;
    abstract protected function generateViewEdit() : string;
    abstract protected function Edit() : void;
    abstract protected function AddNew() : void;
    abstract protected function EnterModelDataFromForm() : void;

    
    public function initialize() : void{
        
        echo $this -> generateHeader();
        print_r($_POST);
        echo("<br/>");
        switch($_POST[self::ACTION] ?? null){
            case self::ADD_NEW:
                $this -> AddNew();
                echo $this -> generateViewAll();
                break;
            case self::DELETE:
                echo '';
                $this -> generateViewAll();
                break;
            case self::CREATE_VIEW:
                echo $this -> generateViewAdd();
                break;
            case self::EDIT:
                $this -> Edit();
                echo $this -> generateViewAll();
                break;
            case self::EDIT_VIEW:
                echo $this -> generateViewEdit();
                break;
            default:
                break;
        }

        echo $this -> generateFooter();
    }

}
?>