<?php

namespace Application\models;

use Illuminate\Database\Eloquent as Eloquent;

class Produit extends Eloquent\Model
{
    protected $table = 'produit';
    protected $primaryKey = 'id';
    public $timestamps = false;

    private int $poids;

    function categorie()
    {
        return $this->belongsTo('Application\models\Categorie', 'categorie');
    }


    function commande()
    {
        return
            $this->belongsToMany('Application\models\User', 'commande', 'id', 'id_user')
                ->withPivot(['id_comm', 'date_comm', 'quantite']);
    }

    function esrFavoris(){
        return $this->belongsToMany('Application\models\User', 'favoris', 'id', 'id_user');
    }


}