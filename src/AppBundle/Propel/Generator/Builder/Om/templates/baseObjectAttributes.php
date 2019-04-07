
    /**
    * attribute to determine if this object has previously been saved.
    * @var boolean
    */
    protected $new = true;

    /**
    * The columns that have been modified in current object.
    * Tracking modified columns allows us to only update modified columns.
    * @var array
    */
    protected $modifiedColumns = array();

    /**
    * The (virtual) columns that are added at runtime
    * The formatters can add supplementary columns based on a resultset
    * @var array
    */
    protected $virtualColumns = array();
