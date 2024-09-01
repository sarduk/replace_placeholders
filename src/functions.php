<?php

/**
 * https://stackoverflow.com/questions/1091107/how-to-join-filesystem-path-strings-in-php
* ['','']             ''            
* ['','/']            '/'           
* ['/','a']           '/a'          
* ['/','/a']          '/a'          
* ['abc','def']       'abc/def'     
* ['abc','/def']      'abc/def'     
* ['/abc','def']      '/abc/def'    
* ['','foo.jpg']      'foo.jpg'     
* ['dir','0','a.jpg'] 'dir/0/a.jpg' 
*/
function join_paths() {
    $paths = array();

    foreach (func_get_args() as $arg) {
        if ($arg !== '') { $paths[] = $arg; }
    }

    return preg_replace('#/+#','/',join('/', $paths));
}


/**
 * source https://core.trac.wordpress.org/browser/tags/5.8/src/wp-includes/functions.php#L2091
 * 
 * Join two filesystem paths together.
 *
 * For example, 'give me $path relative to $base'. If the $path is absolute,
 * then it the full path is returned.
 *
 * @since 2.5.0
 *
 * @param string $base Base path.
 * @param string $path Path relative to $base.
 * @return string The path with the base or absolute path.
 */
function path_join( $base, $path ) {
    if ( path_is_absolute( $path ) ) {
            return $path;
    }
    return rtrim( $base, '/' ) . '/' . ltrim( $path, '/' );
}

/**
 * source https://core.trac.wordpress.org/browser/tags/5.8/src/wp-includes/functions.php#L2091

 * Test if a given filesystem path is absolute.
 *
 * For example, '/foo/bar', or 'c:\windows'.
 *
 * @since 2.5.0
 *
 * @param string $path File path.
 * @return bool True if path is absolute, false is not absolute.
 */
function path_is_absolute( $path ) {
    /*
     * Check to see if the path is a stream and check to see if its an actual
     * path or file as realpath() does not support stream wrappers.
     */
    if ( wp_is_stream( $path ) && ( is_dir( $path ) || is_file( $path ) ) ) {
            return true;
    }
    /*
     * This is definitive if true but fails if $path does not exist or contains
     * a symbolic link.
     */
    if ( realpath( $path ) == $path ) {
            return true;
    }
    if ( strlen( $path ) == 0 || '.' === $path[0] ) {
            return false;
    }
    // Windows allows absolute paths like this.
    if ( preg_match( '#^[a-zA-Z]:\\\\#', $path ) ) {
            return true;
    }
    // A path starting with / or \ is absolute; anything else is relative.
    return ( '/' === $path[0] || '\\' === $path[0] );
}


/**
 * source https://core.trac.wordpress.org/browser/tags/5.8/src/wp-includes/functions.php#L2091
 * 
 * Test if a given path is a stream URL
 *
 * @since 3.5.0
 *
 * @param string $path The resource path or URL.
 * @return bool True if the path is a stream URL.
 */
function wp_is_stream( $path ) {
    $scheme_separator = strpos( $path, '://' );
    if ( false === $scheme_separator ) {
            // $path isn't a stream.
            return false;
    }
    $stream = substr( $path, 0, $scheme_separator );
    return in_array( $stream, stream_get_wrappers(), true );
}

function myPrintOutput($msg){
	echo $msg . "\n";
}
function myDiePrintOutput($msg){
	myPrintOutput($msg);
	exit();
}
function myDiePrintOutputError($msg){
	$msg = "Error! $msg" . "\n".
	//" -h --help" ."\n". " help page";
	" -h --help     help page";
	myPrintOutput($msg);
	exit();
}

$f_write_file = function(string $fullPathFilename_target, string $text_target){
    //https://www.php.net/manual/en/function.file-put-contents.php
    $bytes = file_put_contents($fullPathFilename_target, $text_target);
    if (false === $bytes) {
        $msg =  "(!)errore, Impossibile scrivere nel file $fullPathFilename_target";
        throw new Exception($msg);
    }
};

$f_make_dir = function(string $fullPathDir_target){
    if(!is_dir($fullPathDir_target)){
        if(!mkdir($fullPathDir_target, 0777, true)){
            $msg = ("(!)errore! Impossibile creare la directory \$fullPathDir_target: {$fullPathDir_target}");
            throw new Exception($msg);
        }
    }
};

