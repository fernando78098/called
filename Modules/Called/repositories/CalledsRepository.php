<?php

namespace Modules\Fleet\Repositories;

use Modules\Called\Entities\Called;

class CalledsRepository{

    public function called()
    {
        $model = new Called();
        return $model;
    }

    public function getCalled()
    {
        $list = self::called()->all();
        return $list;
    }

    public function storeCalled( array $data )
    {        
        $called = self::called()->create([
            'user_id' => $data['user_id'],
            'description' => $data['description'],
            'status' => $data['status']
        ]);
        return true;
    }

    public function editCalled( int $id )
    {        
       return self::called()->find($id);
    }

    public function updateCalled( array $data)
    {
        $fleet = self::called()->find($data['id']);
        
        $fleet->update([
            'user_id' => $data['user_id'],
            'description' => $data['description'],
            'status' => $data['status']
        ]);
        return true;        
    }

    public function destroyFleet( int $id)
    {
        $fleet = self::called()->find($id)->delete();
        return true;
    }
}