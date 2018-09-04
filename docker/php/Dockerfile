FROM yiisoftware/yii2-php:7.1-apache

# Install xdebug
RUN cd /tmp && \
    git clone git://github.com/xdebug/xdebug.git && \
    cd xdebug && \
    git checkout 52adff7539109db592d07d3f6c325f6ee2a7669f && \
    phpize && \
    ./configure --enable-xdebug && \
    make && \
    make install && \
    rm -rf /tmp/xdebug

COPY php.ini /usr/local/etc/php/conf.d/zdebug.ini