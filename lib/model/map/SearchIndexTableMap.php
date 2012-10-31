<?php



/**
 * This class defines the structure of the 'search_index' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.model.map
 */
class SearchIndexTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'model.map.SearchIndexTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('search_index');
        $this->setPhpName('SearchIndex');
        $this->setClassname('SearchIndex');
        $this->setPackage('model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('PAGE_ID', 'PageId', 'INTEGER', 'pages', 'ID', true, null, null);
        $this->addColumn('PATH', 'Path', 'VARCHAR', true, 256, null);
        $this->addForeignPrimaryKey('LANGUAGE_ID', 'LanguageId', 'VARCHAR' , 'languages', 'ID', true, 3, null);
        $this->addColumn('LINK_TEXT', 'LinkText', 'VARCHAR', true, 50, null);
        $this->addColumn('PAGE_TITLE', 'PageTitle', 'VARCHAR', true, 255, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'users', 'ID', false, null, null);
        $this->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'users', 'ID', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Page', 'Page', RelationMap::MANY_TO_ONE, array('page_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('Language', 'Language', RelationMap::MANY_TO_ONE, array('language_id' => 'id', ), null, null);
        $this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('SearchIndexWord', 'SearchIndexWord', RelationMap::ONE_TO_MANY, array('id' => 'search_index_id', ), 'CASCADE', null, 'SearchIndexWords');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'denyable' => array('mode' => 'allow', 'role_key' => '', 'owner_allowed' => '', ),
            'extended_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_updated_at' => 'false', ),
            'attributable' => array('create_column' => 'created_by', 'update_column' => 'updated_by', ),
        );
    } // getBehaviors()

} // SearchIndexTableMap
