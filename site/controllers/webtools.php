<?php
/**
 * HUBzero CMS
 *
 * Copyright 2005-2015 HUBzero Foundation, LLC.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * HUBzero is a registered trademark of Purdue University.
 *
 * @package   framework
 * @author    Kevin Wojkovich <kevinw@purdue.edu>
 * @copyright Copyright 2005-2015 HUBzero Foundation, LLC.
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Components\Webtools\Site\Controllers;

use Hubzero\Component\SiteController;
use Components\Webtools\Models\Webtools;

/**
 * Webtools controller for time component
 */
class Webtools extends SiteController 
{
	/**
	 * Default view function
	 *
	 * @return  void
	 */
	public function displayTask()
	{
		$webtools = Webtools::all();

		// Display
		$this->view->webtools = $webtools->paginated()->ordered();
		$this->view->display();
	}

	/**
	 * New task
	 *
	 * @return  void
	 */
	public function newTask()
	{
		$this->view->setLayout('edit');
		$this->view->task = 'edit';
		$this->editTask();
	}

	/**
	 * New/Edit function
	 *
	 * @return  void
	 */
	public function editTask($webtools=null)
	{
		if (!isset($webtools) || !is_object($webtools))
		{
			$webtools = Webtools::oneOrNew(Request::getInt('id'));
		}

		// Display
		$this->view->row = $webtools;
		$this->view->display();
	}

	/**
	 * Save new time record and redirect to the records page
	 *
	 * @return  void
	 */
	public function saveTask()
	{
		// Create object
		$webtools = Webtools::oneOrNew(Request::getInt('id'))->set([]);

		if (!$webtools->save())
		{
			// Something went wrong...return errors
			foreach ($webtools->getErrors() as $error)
			{
				$this->view->setError($error);
			}

			$this->view->setLayout('edit');
			$this->view->task = 'edit';
			$this->editTask($webtools);
			return;
		}

		// Set the redirect
		$this->setRedirect(
			Route::url('index.php?option=' . $this->_option . '&controller=' . $this->_controller),
			Lang::txt('COM_WEBTOOLS_SAVE_SUCCESSFUL'),
			'passed'
		);
	}

	/**
	 * Delete records
	 *
	 * @return  void
	 */
	public function deleteTask()
	{
		$webtools = Webtools::oneOrFail(Request::getInt('id'));

		// Delete webtools
		$webtools->destroy();

		// Set the redirect
		$this->setRedirect(
			Route::url('index.php?option=' . $this->_option . '&controller=' . $this->_controller),
			Lang::txt('COM_WEBTOOLS_DELETE_SUCCESSFUL'),
			'passed'
		);
	}
}
