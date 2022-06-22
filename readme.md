# SemVer
The `PHPLAK\SemVer` object is almost perfect.  But, because it uses the `__get`
magic method to access private properties within the Version object, it's hard
to check for missing data.  This object extends that one and adds these last
few features.
