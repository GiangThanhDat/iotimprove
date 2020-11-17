<?php 

/**
 * 
 */
class controller
{		
	
	function __construct()
	{
		
	}

	public function model($model){
		require_once MODElS.$model.".php";
		return new $model;
	}
	//Lưu ý: nên chuyển data về dạng JSON trước khi truyền vào view(chuyển trong models).
	public function view($layout, $data=[]){		
		require_once VIEWS.$layout.".php";
	}

    // public function index(){} // list domains
    // public function create(){} // show create form
    // public function store(Request $request){ } // handle the form POST 
    // public function show($id){} // show a single domain
    // public function edit($id){} // show edit page
    // public function update(Request $request, $id){} // handle show edit page POST
    // public function destroy($id){} // delete a domain	
}
 ?>