<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CategoryProduct Controller
 *
 * @property \App\Model\Table\CategoryProductTable $CategoryProduct
 *
 * @method \App\Model\Entity\CategoryProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoryProductController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Category', 'Product']
        ];
        $categoryProduct = $this->paginate($this->CategoryProduct);

        $this->set(compact('categoryProduct'));
    }

    /**
     * View method
     *
     * @param string|null $id Category Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoryProduct = $this->CategoryProduct->get($id, [
            'contain' => ['Category', 'Product']
        ]);

        $this->set('categoryProduct', $categoryProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoryProduct = $this->CategoryProduct->newEntity();
        if ($this->request->is('post')) {
            $categoryProduct = $this->CategoryProduct->patchEntity($categoryProduct, $this->request->getData());
            if ($this->CategoryProduct->save($categoryProduct)) {
                $this->Flash->success(__('The category product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category product could not be saved. Please, try again.'));
        }
        $category = $this->CategoryProduct->Category->find('list', ['limit' => 200]);
        $product = $this->CategoryProduct->Product->find('list', ['limit' => 200]);
        $this->set(compact('categoryProduct', 'category', 'product'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoryProduct = $this->CategoryProduct->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoryProduct = $this->CategoryProduct->patchEntity($categoryProduct, $this->request->getData());
            if ($this->CategoryProduct->save($categoryProduct)) {
                $this->Flash->success(__('The category product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category product could not be saved. Please, try again.'));
        }
        $category = $this->CategoryProduct->Category->find('list', ['limit' => 200]);
        $product = $this->CategoryProduct->Product->find('list', ['limit' => 200]);
        $this->set(compact('categoryProduct', 'category', 'product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoryProduct = $this->CategoryProduct->get($id);
        if ($this->CategoryProduct->delete($categoryProduct)) {
            $this->Flash->success(__('The category product has been deleted.'));
        } else {
            $this->Flash->error(__('The category product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
