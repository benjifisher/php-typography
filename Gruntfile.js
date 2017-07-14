'use strict';
module.exports = function(grunt) {

    // load all tasks
    require('load-grunt-tasks')(grunt, {
        scope: 'devDependencies'
    });

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        shell: {
            update_patterns: {
                targetDir: 'lang',
                command: (function() {
                    var cli = [];
                    grunt.file.readJSON('bin/patterns.json').list.forEach(function(element) {
                        cli.push('php bin/pattern2json.php -l "' + element.name + '" -f ' + element.url + ' > <%= shell.update_patterns.targetDir %>/' + element.short + '.json');
                    });

                    return cli;
                })().join(' && ')
            }
        },

	    phpcs: {
	        plugin: {
	            src: ['**/*.php', 'tests/**/*.php']
	        },
	        options: {
	        	bin: '/usr/local/opt/php-code-sniffer@2.9/bin/phpcs -p -s -v -n --ignore=_language_names.php --ignore=tests/perf.php',
	            standard: './phpcs.xml'
	        }
	    },

	    phpunit: {
	        default: {
	            options: {
	            	testsuite: 'phptypography',
	            }
	        },
	        coverage: {
	            options: {
	            	testsuite: 'phptypography',
	            	coverageHtml: 'tests/coverage/',
	            }
	        },
	        options: {
	            colors: true,
	            configuration: 'phpunit.xml',
	        }
	    },

        copy: {
            main: {
                files: [{
                    expand: true,
                    nonull: true,
                    src: [
                        'readme.txt',
                        'CHANGELOG.md',
                        '*.php',
                        '*.php',
                        'lang/*.json',
                        'diacritics/*.json',
                        'vendor/**',
                    ],
                    dest: 'build/'
                }],
            }
        },

        clean: {
            build: ["build/*"] //,
        },

        curl: {
            'update-iana': {
                src: 'https://data.iana.org/TLD/tlds-alpha-by-domain.txt',
                dest: 'vendor/IANA/tlds-alpha-by-domain.txt'
            }
        },
    });

    // update various components
    grunt.registerTask('update:iana', ['curl:update-iana']);
    grunt.registerTask('update:patterns', ['shell:update_patterns']);

    grunt.registerTask('default', [
        //'phpunit:default',
        'phpcs'
    ]);
};
