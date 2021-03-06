<?php if (!defined('APPLICATION')) exit();

/**
 * A module for a list of links.
 * 
 * @author Todd Burry <todd@vanillaforums.com> 
 * @copyright 2003 Vanilla Forums, Inc
 * @license http://www.opensource.org/licenses/gpl-2.0.php GPL
 * @package Garden
 * @since 2.3
 */

/**
 * 
 */
class SiteNavModule extends NavModule {
   /// Properties ///
   
   protected $customSections = array('EditProfile', 'Profile');
   
   /// Methods ///
   
   public function render() {
      $section_found = false;
      
      // The module contains different links depending on its section.
      foreach ($this->customSections as $section) {
         if (InSection($section)) {
            $this->fireEvent($section);
            $section_found = true;
            break;
         }
      }
      
      // If a section wasn't found then add the default nav.
      if (!$section_found)
         $this->fireEvent('default');
      
      // Fire an event for everything.
      $this->fireEvent('all');
      
      parent::render();
   }
}