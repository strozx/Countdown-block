<?php
/**
 * Created by PhpStorm.
 * User: nikst
 * Date: 6. 10. 2018
 * Time: 12:43
 */
namespace Drupal\countdown\Plugin\Block;
use DateTime;
use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;

/**
 * Provides a 'Countdown' Block.
 * @Block(
 *   id= "countdown_block",
 *   admin_label = @Translation("Countdown Block"),
 *  )
 *
 */
class Countdown extends BlockBase{

    /**
     * {@inheritdoc}
     */
    public function build() {


        $node = \Drupal::routeMatch()->getParameter('node');
        if ($node instanceof \Drupal\node\NodeInterface) {
            $nid = $node->id(); //gets node id
        }
        $node = \Drupal\node\Entity\Node::load($nid); //gets data of current node
        $datetime =$node->get('field_event_date')->getValue(); //gets the event's date

        //2018-02-16T19:00:00
        $date = $datetime[0]['value'];
        //sends date of the event to the method and recives back if the event is happenenig or has aleredy happend or how many day away the event is
        //$days= $this->setCountdown();
        $service = \Drupal::service('countdown.countdownS');
        $days = $service->calc_dates(date(strtotime($date)));
        return array(
            '#markup' => $days,
        );
    }

    //prevents the block from being cached
    public function getCacheMaxAge() {
        return 0;
    }
}
