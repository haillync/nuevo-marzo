<?php
    /**
     * Model database for Video tables
     * 
     * @package OSClass
     * @subpackage Model
     * @since 3.0
     */
    class ModelVideo extends DAO
    {
        /**
         * It references to self object: ModelVideo.
         * It is used as a singleton
         * 
         * @access private
         * @since 3.0
         * @var ModelVideo
         */
        private static $instance ;

        /**
         * It creates a new ModelVideo object class ir if it has been created
         * before, it return the previous object
         * 
         * @access public
         * @since 3.0
         * @return ModelVideo
         */
        public static function newInstance()
        {
            if( !self::$instance instanceof self ) {
                self::$instance = new self ;
            }
            return self::$instance ;
        }

        /**
         * Construct
         */
        function __construct()
        {
            parent::__construct();
        }
        
        /**
         * Return table name video embed plugin
         * @return string
         */
        public function getTable_VideoAttr()
        {
            return DB_TABLE_PREFIX.'t_item_video_embed' ;
        }
        
        /**
         * Import sql file
         * @param type $file 
         */
        public function import($file)
        {
            $path = osc_plugin_resource($file) ;
            $sql = file_get_contents($path);

            if(! $this->dao->importSQL($sql) ){
                throw new Exception( "Error importSQL::ModelVideo<br>".$file ) ;
            }
        }
        
        /**
         *  Remove data and tables related to the plugin.
         */
        public function uninstall()
        {
            $this->dao->query('DROP TABLE '. $this->getTable_VideoAttr());
        }
        
        /**
         * Get video embed plugin given a item id 
         *
         * @param int $item_id
         * @return array
         */
        public function getAttrByItemId( $item_id )
        {
            $this->dao->select();
            $this->dao->from( $this->getTable_VideoAttr() );
            $this->dao->where('fk_i_item_id', $item_id );
            
            $result = $this->dao->get();
            
            if( !$result ) {
                return array();
            }
            
            return $result->row();
        }
        
        /**
         * Insert video embed plugin
         *
         * @param int $item_id
         * @param string $video 
         */
        public function insertAttr( $item_id, $video)
        {
            $aSet = array(
                's_video'  => $video,
                'fk_i_item_id' => $item_id
                );
            
            return $this->dao->insert( $this->getTable_VideoAttr(), $aSet);
        }
        
        /**
         * Update video embed plugin
         *
         * @param string $item_id
         * @param string $video 
         */
        public function updateAttr($item_id, $video)
        {
            $aSet = array(
                's_video'  => $video
            );
            
            $aWhere = array( 'fk_i_item_id' => $item_id);
            
            return $this->_update($this->getTable_VideoAttr(), $aSet, $aWhere);
        }
        
         /**
         * Delete house attributes given a item id
         * @param type $item_id 
         */
        public function deleteItem($item_id)
        {
            return $this->dao->delete($this->getTable_VideoAttr(), array('fk_i_item_id' => $item_id) ) ;

        }
        
        // update
        function _update($table, $values, $where)
        {
            $this->dao->from($table) ;
            $this->dao->set($values) ;
            $this->dao->where($where) ;
            return $this->dao->update() ;
        }
    }

?>