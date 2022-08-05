<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class CommentsTable extends Table
{
    public function initialize(array $config) {
        parent::initialize($config); // TODO: Change the autogenerated stub
        $this->addBehavior('Timestamp');  

        $this->belongsTo('Posts', [
            'className' => 'Posts',
            'foreignKey' => 'post_id'
        ]);      

        $this->belongsTo('Users', [
            'className' => 'Users',
            'foreignKey' => 'commenter_id'
        ]);  
    }

    
}
