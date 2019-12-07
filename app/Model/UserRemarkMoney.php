<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 * @property int $id 
 * @property string $openid 
 * @property int $type_id 
 * @property int $money 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class UserRemarkMoney extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_remark_money';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'int', 'type_id' => 'integer', 'money' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}