<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CategoryProduct Model
 *
 * @property \App\Model\Table\CategoryTable|\Cake\ORM\Association\BelongsTo $Category
 * @property \App\Model\Table\ProductTable|\Cake\ORM\Association\BelongsTo $Product
 *
 * @method \App\Model\Entity\CategoryProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\CategoryProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CategoryProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CategoryProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CategoryProduct|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CategoryProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CategoryProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CategoryProduct findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoryProductTable extends Table
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

        $this->setTable('category_product');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Category', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Product', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
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

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['category_id'], 'Category'));
        $rules->add($rules->existsIn(['product_id'], 'Product'));

        return $rules;
    }
}
