<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Product Model
 *
 * @property \App\Model\Table\CategoryTable|\Cake\ORM\Association\BelongsToMany $Category
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('product');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Category', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'category_product'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 4294967295)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->allowEmpty('description');

        $validator
            ->scalar('image')
            ->maxLength('image', 4294967295)
            ->allowEmpty('image');

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->scalar('features')
            ->maxLength('features', 4294967295)
            ->allowEmpty('features');

        return $validator;
    }
}
