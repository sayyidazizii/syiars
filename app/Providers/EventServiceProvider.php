<?php
namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $menus = Cache::remember("menus".auth()->id(), (60 * 60 * 60), function () {
           ->join('system_user_group','system_user_group.user_group_id','=','system_user.user_group_id')
           ->join('system_menu_mapping','system_menu_mapping.user_group_level','=','system_user_group.user_group_level')
           ->join('system_menu','system_menu.id_menu','=','system_menu_mapping.id_menu')
           ->where('system_user.user_id','=',auth()->id())
           ->orderBy('system_menu_mapping.id_menu','ASC')->get();
          });
            $menus =User::select(['system_menu_mapping.*','system_menu.*']) 
           ->join('system_user_group','system_user_group.user_group_id','=','system_user.user_group_id')
           ->join('system_menu_mapping','system_menu_mapping.user_group_level','=','system_user_group.user_group_level')
           ->join('system_menu','system_menu.id_menu','=','system_menu_mapping.id_menu')
           ->where('system_user.user_id','=',auth()->id())
           ->orderBy('system_menu_mapping.id_menu','ASC')->get()->toArray();
         
        $last_key = 'tes';
        $last_key2= 'tes';
        $last_key3= 'tes';
   
        foreach($menus as $key => $val){
        if($val['indent_level']==1){
        $event->menu->add([
        'key' => $val['id_menu'],
        'text'=> $val['text'],
        'url' => $val['id'],
        'active'=> [$val['id'].'/*'],
        'icon'=> '',
        ]);
        $last_key = $val['id_menu'];
        }else if($val['indent_level']==2){
        $event->menu->addIn($last_key,[
        'key' => $val['id_menu'],
        'text'=> $val['text'],
        'url' => $val['id'],
        'active'=> [$val['id'].'/*'],
        'classes' => 'level-two',
        'icon'=> '',
        ]);
        $last_key2 = $val['id_menu'];
        }else if($val['indent_level']==3){
        $event->menu->addIn($last_key2,[
        'key' => $val['id_menu'],
        'text'=> $val['text'],
        'url' => $val['id'],
        'active'=> [$val['id'].'/*'],
        'classes' => 'level-three',
        'icon'=> '',
        ]);
        $last_key3 = $val['id_menu'];
        }else if($val['indent_level']==4){
        $event->menu->addIn($last_key3,[
        'key' => $val['id_menu'],
        'text'=> $val['text'],
        'url' => $val['id'],
        'active'=> [$val['id'].'/*'],
        'classes' => 'level-four',
        'icon'=> '',
        ]);
        }
        }
        });
    }
}
