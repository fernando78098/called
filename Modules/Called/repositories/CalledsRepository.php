<?php

namespace Modules\Called\Repositories;

use Modules\Called\Entities\Called;

class CalledsRepository{

    public function called()
    {
        $model = new Called();
        return $model;
    }

    public function getCalled()
    {
        $list = self::called()->with(['user'])->get();
        return $list;
    }

    public function storeCalled( array $data )
    {        
        $called = self::called()->create([
            'user_id' => auth()->user()->id,
            'description' => $data['description'],
            'status' => 'Aguardando atendimento'
        ]);
        return true;
    }

    public function editCalled( int $id )
    {        
       return self::called()->find($id);
    }

    public function showCalled( int $id )
    {        
       return self::called()->with(['user'])->find($id);
    }

    public function updateCalled( array $data)
    {
        $fleet = self::called()->find($data['id']);
        
        $fleet->update([
            'description' => $data['description'],
            'solution' => $data['solution'], 
        ]);
        return true;        
    }

    public function destroyFleet( int $id)
    {
        $fleet = self::called()->find($id)->delete();
        return true;
    }

    public function finishCalled( array $data )
    {        
        $fleet = self::called()->find($data['id']);
        
        $fleet->update([
            'solution' => $data['solution'],   
            'status' => 'Atendido'
        ]);
    }
}