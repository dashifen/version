<?php

namespace Dashifen\Version;

// since our object and the baseline one that we extend are both named Version,
// we just use the namespaced version of that object rather than using it with
// an alias.

class Version extends \PHLAK\SemVer\Version
{
  public function __construct(string $version = '0.1.0')
  {
    $version = \PHLAK\SemVer\Version::parse($version);
    parent::__construct($version);
  }
  
  /**
   * getMajor
   *
   * Returns the major version number (e.g. the 1 in 1.2.3).
   *
   * @return int
   */
  public function getMajor(): int
  {
    return $this->get('major');
  }
  
  /**
   * get
   *
   * Each of the public methods of this object do the same work on different
   * properties of our parent.  Therefore, this method does the work having
   * received the property name on which to perform that work.
   *
   * @param string $property
   *
   * @return int
   */
  private function get(string $property): int
  {
    // here's where our work shines:  the property isn't defined, this method
    // will return zero.  this is most likely to happen with a build number
    // because the parse method called in our constructor should default the
    // minor and patch versions to zero if they're not present.
    
    return !empty($this->$property) ? $this->$property : 0;
  }
  
  /**
   * getMinor
   *
   * Returns the minor version number (e.g. the 2 in 1.2.3) or zero if there
   * isn't a minor version number at this time.
   *
   * @return int
   */
  public function getMinor(): int
  {
    return $this->get('minor');
  }
  
  /**
   * getPatch
   *
   * Returns the patch version number (e.g. the 3 in 1.2.3) or zero if there
   * isn't a patch version at this time.
   *
   * @return int
   */
  public function getPatch(): int
  {
    return $this->get('patch');
  }
  
  /**
   * getBuild
   *
   * Returns the current build number (i.e. the 4 in 1.2.3+4) or zero if a
   * build number doesn't currently exist.
   *
   * @return int
   */
  public function getBuild(): int
  {
    return $this->get('build');
  }
}
