pipeline {
            agent any
                stages {
                        stage('Descargar') {
                            steps {
                                echo 'descargando...'
                                sh 'rm -R * || true'
                                sh 'rm -R .* || true'
                                sh 'git clone https://github.com/MarioRepisoRomero/iaw.git .'
                                echo 'Llamando a compose'
                                sh 'composer require --dev phpunit/phpunit | composer require  phpmailer/phpmailer'
                            }
                        }
                        stage('Deploy') {
                            steps {
                                echo 'Desplegando'
                                sh 'cp /var/lib/jenkins/workspace/proyect/* /var/www/html/'
                                sh 'composer -d /var/www/html require phpmailer/phpmailer'
                            }
                        }
                }
            post {
                always {
                    echo 'Pipeline en ejecución'
                }
                success {
                    echo 'Parece que todo ha ido bien'
                }
                failure {
                    echo 'Algo ha fallado'
                    mail to: "mreprom501.alumnado @politecnicomalaga.com",
                         subject: "Failed Pipeline: ${currentBuild.fullDisplayName}",
                         body: "Algo ha fallado con ${env.BUILD_URL}"
                }
            }
}
