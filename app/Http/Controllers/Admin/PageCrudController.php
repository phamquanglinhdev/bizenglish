<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Page::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/page');
        CRUD::setEntityNameStrings('Các trang tĩnh', 'Các trang tĩnh');
        $this->crud->denyAccess('show');
        $this->crud->denyAccess('delete');
        $this->crud->denyAccess('create');
        $this->crud->addButtonFromModelFunction('top','updatePage','updatePage','top');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PageRequest::class);
        $this->crud->addField(['name'=>'how_learn','label'=>'Cách thức học','type'=>'ckeditor']);
        $this->crud->addField(['name'=>'faq','label'=>'Câu hỏi thường gặp','type'=>'ckeditor']);
        $this->crud->addField(['name'=>'payment','label'=>'Học phí và thanh toán','type'=>'ckeditor']);
        $this->crud->addField(['name'=>'be_teacher','label'=>'Trở thành giáo viên','type'=>'ckeditor']);
        $this->crud->addField(['name'=>'be_client','label'=>'Trở thành đối tác','type'=>'ckeditor']);
        $this->crud->addField(['name'=>'for_bussiness','label'=>'Tiếng anh cho doanh nghiệp','type'=>'ckeditor']);
        $this->crud->setTabsType('ckeditor'); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
