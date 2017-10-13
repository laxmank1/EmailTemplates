<?php

namespace smartdata\Email;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;
use Datatables;

class EmailController extends Controller
{

	/**
     * Update the specified resource in email Template.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String
     */
    public function updateEmailTemplateById(Request $request)
    {
		$this->validate($request, [
		    		
		    		'name' => 'required|unique:emails,name,'.$request->id,
		    		'subject' => 'required',
		    		'message' => 'required'
		    	]);

        Emails::find($request->id)->update($request->all());

        return redirect()->route('emailt')
                        ->with('success','Email Template update successfully!!');
    }   

 	/**
     *  Show the form for creating a new Email Template.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('AddEmail::create');
             
    }

 	/**
     * Display a listing of the email Template resources.
     *@param  \Illuminate\Http\Request  $request
     * @return Array
     */
	public function selectAllEmailTemplateList(Request $request)
	{
		$items = Emails::orderBy('id','DESC')->paginate(15);

		return view('email::list',compact('items'))
		->with('i', ($request->input('page', 1) - 1) * 15);
	}


	/**
     * add a new resource in email template.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String
     */
	public function addEmailTemplate(Request $request)
    {
		$this->validate($request, [
				
				'name' => 'required|unique:emails',
				'subject' => 'required',
				'message' => 'required'
			]);

		Emails::create($request->all());

		return redirect()->route('emailt')
                        ->with('success','Email Template added successfully!');


	}

	/**
     * Remove the specified resource from email template.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String
     */
    public function destroyEmailTemplateById(Request $request)
    {
        Emails::find($request->id)->delete();
        return back()->with('success', 'Email Template delete successfully!');

    }


	/**
	 * Show the Email template  for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Array
	 */
	public function editEmailTemplateById($id){

		$item = Emails::find($id);
	  
		return view('update::edit',compact('item'));

	}

     /**
     * Show the Email template  list.
     *
     * @param  int  $id
     * @return Array
     */
    public function pagingnateServerSide(){

        $items = Emails::orderBy('id','DESC')->paginate(2);
      
        return view('update::listpagingnate',compact('items'));

    }

    /**
    * Show the Email template  list inside dataTable.
    *
    * 
    * @return Array
    */
    public function pagingnateDataTable(){

        $items = Emails::orderBy('id','DESC')->paginate(2);
      
        return view('update::listupdate',compact('items'));

    }

    /**

    * Show the application dashboard.

    *

    * @return \Illuminate\Http\Response

    */

    public function getPostsEmails()

    {

        $items = DB::table('emails')->select('*');

          return Datatables::of($items)
            ->addColumn('action', function ($item) {
                return '<a href="../email/edit/'.$item->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);

        return Datatables::of($items)

            ->make(true);

    }
}
