<?

class Controller_Formal extends Controller
{
    public $model;

    function __construct()
    {
        $this->model = new Model_Formal();
        $this->view = new View();
    }

    function action_index()
    {
        session_start();
        if (isset($_COOKIE['cart'])) {
            
            $res = $this->model->save_data();
            if ($res) {
                header("Location: /cart?clear=1");
                header("Location: /catalog");
            } else {
                header("Location: /404");
            }
        }
    }
}
