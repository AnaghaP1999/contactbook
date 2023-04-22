<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class HomeController extends Controller
{
    private $contactModel;

    /**
     * contructor
     *
     * @param Contact $contactModel
     */
    public function __construct(
        Contact $contactModel
    )
    {
        $this->contactModel = $contactModel;
    }

    /**
     * to get all the contacts
     *
     * @return void
     */
    public function home() {
        $list =  $this->contactModel->getContactList();

        return view('index', [
            'list' => $list
        ]);

    }

    /**
     * to get the details of a single contact
     *
     * @param integer|null $id
     * @return void
     */
    public function viewContact(int $id = null) {
        $query =  $this->contactModel->getContactById($id);

        return view('details', [
            'query' => $query
        ]);

    }

    /**
     * add contact page
     *
     * @return void
     */
    public function addContact() {
        return view('create');
    }

    /**
     * to add/update contact details
     *
     * @param Request $request
     * @return void
     */
    public function saveContact(Request $request)  {

        DB::beginTransaction();

        try {
            $postData = $request->except(['_token', 'id']);
            $id = $request->has('id') ? $request->input('id') : '';

            $validated = $request->validate([
                'name' => 'required',
                'phone' => 'required|digits:10'
            ]);

            if ($id) {
                $this->contactModel::where('id', $id)->update($postData);
            } else {
                $this->contactModel::insert($postData);
            }

            DB::commit();

            return redirect()->route('home')->with('success', 'Contact Added/Updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('home')->with('error', $e->getMessage());
        }
        return redirect()->route('home')->with('error', 'Error occurred please try again');
    }

    /**
     * edit contact page
     *
     * @param integer|null $id
     * @return void
     */
    public function editContact(int $id = null) {
        $query =  $this->contactModel->getContactById($id);

        return view('edit', [
            'query' => $query
        ]);
    }

    /**
     * to delete a contact
     *
     * @param integer|null $id
     * @return void
     */
    public function deleteContact(int $id = null) {
        DB::beginTransaction();
        try {
            $result = $this->contactModel::where('id', $id)->delete();            
            DB::commit();

            return redirect()->route('home')->with('success', 'Contact deleted successfully');
        } catch (Exception $e) {
            DB::rollBack();
            
            return redirect()->route('home')->with('error', $e->getMessage());
        }

        return redirect()->route('home')->with('error', 'Error occurred please try again');
    }
}
