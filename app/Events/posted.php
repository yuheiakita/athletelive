<?php
namespace APP\Events;

use App\Models\Post;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Posted implements shouldBroadcast
{
 use serializesModels;

 /**
  * @var Post
  */
  public $post;

  /**
   * Posted constructer.
   * @param Post $post
   */
  public function __construct(Post $post)
  {
      $this->post = $post;
  }

  /**
   * @return Channel|Channel[]
   */
  public function broadcastOn()
  {
      return new Channnel('post');
  }
}
