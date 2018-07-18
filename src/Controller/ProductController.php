<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Product Controller
 *
 * @property \App\Model\Table\ProductTable $Product
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $product = $this->paginate($this->Product);

        $this->set(compact('product'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $this->viewBuilder()->setLayout('mobly');

        $this->loadModel('Category');
        $category = $this->Category->find('all');
        $this->set(compact('category'));

        $product = $this->Product->get($id, [
            'contain' => ['Category']
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $product = $this->Product->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Product->patchEntity($product, $this->request->getData());
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $category = $this->Product->Category->find('list', ['limit' => 200]);
        $this->set(compact('product', 'category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $product = $this->Product->get($id, [
            'contain' => ['Category']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Product->patchEntity($product, $this->request->getData());
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $category = $this->Product->Category->find('list', ['limit' => 200]);
        $this->set(compact('product', 'category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Product->get($id);
        if ($this->Product->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addToCart($id) {
        $product = $this->Product->get($id);
        ini_set('session.gc_maxlifetime', 10);


        session_set_cookie_params(10);
        $session = $this->request->session();

        if (!$session->read('leoguepe')) {
            $_SESSION['leoguepe']['Products'][$product->id] = ['id' => $product->id, 'name' => $product->name,
                'price' => $product->price, 'image' => $product->image, 'count' => 1];

            $_SESSION ['leoguepe']['User'] = ['username' => 'leoguepe', 'name' => 'Leonardo Guedes',
                'address' => 'Avenida Nossa Senhora de Copacabana, 1250/606 - Copacabana/RJ'];
        } else {
            if (isset($_SESSION['leoguepe']['Products'][$product->id])) {
                $_SESSION['leoguepe']['Products'][$product->id]['count'] = $_SESSION['leoguepe']['Products'][$product->id]['count'] + 1;
            } else {
                $_SESSION['leoguepe']['Products'][$product->id] = ['id' => $product->id, 'name' => $product->name,
                    'price' => $product->price, 'image' => $product->image, 'count' => 1];
            }
        }

        $tmpCount = 0;

        foreach ($_SESSION['leoguepe']['Products'] as $productDetail) {
            $tmpCount = $tmpCount + ($productDetail['count'] * $productDetail['price']);
        }

        $_SESSION['leoguepe']['Order']['Total'] = $tmpCount;

        $this->set('product', $product);
        return $this->redirect(['controller' => 'home', 'action' => 'myCart', 'leoguepe']);
    }

}
