<?php

/**
 * Gets the HTML code from a given template. You can pass optional parameters to display them into the template
 *
 * @param string $templatePath
 * @param array  $args
 *
 * @return string
 */
function get_template( string $templatePath, array $args ) : string {
    extract( $args );

  
  ob_start();
  require $templatePath;
  return ob_get_clean();
}



/**
 * Gets the common header HTML code, you can set an optional page meta title
 *
 * @param array{
 *     title:string
 * } $args
 *
 * @return string
 */
function get_header( array $args ) : string {
  extract( $args );
  
  ob_start();
  require __PROJECT_ROOT__ . "/views/fragments/header.php";
  return ob_get_clean();
}



/**
 * Gets the common footer HTML Code
 *
 * @return string
 */
function get_footer () : string {
  ob_start();
  require __PROJECT_ROOT__ . "/views/fragments/footer.php";
  return ob_get_clean();
}



/**
 * Gets the 404 page HTML code
 *
 * @return string
 */
function get_404 () : string {
  http_response_code(404);
  
  ob_start();
  require __PROJECT_ROOT__ . "/views/404.php";
  return ob_get_clean();
}

/***
 * @param DateTime $date
 * @return string
 */
function datesss($date):string
{
    $dates=(new DateTime());
    $diff = $date->diff($dates);
    if ($diff->y==0 and $diff->m==0 and $diff->d==0 and $diff->h==0 and $diff->i==0 and $diff->s<60)
        return " Publié à l'instant";

    if ( $diff->y==0 and $diff->m==0 and $diff->d==0 and $diff->h==0 and $diff->i<60)
        return "Publié il y'a ".floor(abs($diff->i)).' minutes';

    if ($diff->y==0 and $diff->m==0 and $diff->d==0 and $diff->h<24)
        return "Publié il y'a ".floor(abs($diff->h)).' heures';

    if ($diff->y==0 and $diff->m==0 and $diff->d<7)

         return "Publié il y'a ".floor(abs($diff->d)).' jours';

    if($diff->y!=0 or $diff->m!=0 or $diff->d>7)

        return  "Publié le ".$date->format('d/m/Y');

    return  "";

}