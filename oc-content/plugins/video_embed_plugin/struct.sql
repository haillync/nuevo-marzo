CREATE TABLE /*TABLE_PREFIX*/t_item_video_embed (
    fk_i_item_id INT UNSIGNED NOT NULL,
    s_video VARCHAR(350),

        PRIMARY KEY (fk_i_item_id),
        FOREIGN KEY (fk_i_item_id) REFERENCES /*TABLE_PREFIX*/t_item (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';