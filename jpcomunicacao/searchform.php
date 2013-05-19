                <form id="search" name="search" method="get" action="<?php echo bloginfo( 'wpurl' ); ?>">                
                    <input type="text" id="s" name="s" value="Looking for something" onblur="if (this.value == ''){this.value = 'Looking for something'; }" onfocus="if (this.value == 'Looking for something') {this.value = ''; }" /> 
                    <input name="search" value="Search" class="submit" type="submit" />
                </form><!--END search-->
