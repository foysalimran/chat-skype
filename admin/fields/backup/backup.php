<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: backup
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'SCS_Field_backup' ) ) {
  class SCS_Field_backup extends SCS_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $unique = $this->unique;
      $nonce  = wp_create_nonce( 'scs_backup_nonce' );
      $export = add_query_arg( array( 'action' => 'scs-export', 'unique' => $unique, 'nonce' => $nonce ), admin_url( 'admin-ajax.php' ) );

      echo esc_html($this->field_before());

      echo '<textarea name="scs_import_data" class="scs-import-data"></textarea>';
      echo '<button type="submit" class="button button-primary scs-confirm scs-import" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Import', 'chat-skype' ) .'</button>';
      echo '<hr />';
      echo '<textarea readonly="readonly" class="scs-export-data">'. esc_attr( wp_json_encode( get_option( $unique ) ) ) .'</textarea>';
      echo '<a href="'. esc_url( $export ) .'" class="button button-primary scs-export" target="_blank">'. esc_html__( 'Export & Download', 'chat-skype' ) .'</a>';
      echo '<hr />';
      echo '<button type="submit" name="scs_transient[reset]" value="reset" class="button scs-warning-primary scs-confirm scs-reset" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Reset', 'chat-skype' ) .'</button>';

      echo $this->field_after();

    }

  }
}