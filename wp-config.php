<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'lvm2013');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'th');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'Pastorius1');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Bz+<$,q+J>b]V%^IV+bsY+HB?r-WeK|NGM8:i3k}0Z[aG;!3t4q~*K!Dc@)2UuW2');
define('SECURE_AUTH_KEY',  'y?2=8lUW|vD|vMg|>SM{1#WuP$f|]u.$g*z41P+[.f8kx2{;aK0%^[9FE88I5^:+');
define('LOGGED_IN_KEY',    '@d|%3>z-*?4yr10`FlPNv`h/{|-oC+Y|n+W<+6iA>1v=`}kmmK(^tv+x?S1-~9}f');
define('NONCE_KEY',        ':<BVO:H8@8Q? E94*-!RmU3RPLJQ~{lN~sOKV:-jkZfiR`d)(+j#a&$Puo6CJFKg');
define('AUTH_SALT',        'EQkozPu>wd+Fxq94-++.nPH g+0!wo*P.7,%9Gi!yWQ^{LjCyC1G4UHs>w^+UOrn');
define('SECURE_AUTH_SALT', 'N0AkkBBDkC`4LrBybUvko{s)v_b.s0G:=|-E%e>I)[7@FY)I)e:f!KPS7^6Ez<<|');
define('LOGGED_IN_SALT',   ')2} 8^GK<(z(vW:@|Rb3?vo*t>?]]R<r-j-,U+>G-t8<$zEK/e3K2,;du}|xlaB1');
define('NONCE_SALT',       'KQ+~@[uRl/nI%t/lEX|d-]8@1jf=F?1[+[)[`LMLy()+F~L5*|h(xoj{7-k+ev}8');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = '2013_lvm_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', true);

/**
 * Desativar revisões
 */
define('WP_POST_REVISIONS', false);

/**
 * Aumentar o tempo entre autosaves para economizar memória
 */
define('AUTOSAVE_INTERVAL', 300);

/** Automatic database repair **/
define('WP_ALLOW_REPAIR', true);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
