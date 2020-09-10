<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    protected $auth;
    protected $total;
    protected $count;

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('Data');

        // Allow the display action so our PagesController
        // continues to work. Also enable the read only actions.
    }

    public function isAuthorized($user)
    {
        // if ((!isset($user['role'])) || ('' === $user['role'])) return false;

        // // If we're trying to access the admin view, verify permission:
        // if ('admin' === $this->action)
        // {
        //   if (1 == $user['role']) return true;  // User is admin, allow
        //   return false;                                // User isn't admin, deny
        // }

        // return true;
        // Any registered user can access public functions
        if (!$this->request->getParam('prefix')) {
            return true;
        }
        // Default deny
        return false;
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check.
        $this->Authentication->addUnauthenticatedActions(['index', 'view']);
        $this->auth = $this->Authentication->getResult()->getData();
        $cate = $this->getTableLocator()->get('Categories')->find()->where(['parent >' => 0]);
        $this->set('cate', $cate);
        $this->set('auth', $this->auth);
        $this->set('count', $this->request->getSession()->check('cart') ? count($this->request->getSession()->read('cart')) : 0);
        $this->set('total', $this->request->getSession()->check('cart') ? $this->Data->getTotal($this->request->getSession()) : 0);
    }
}
