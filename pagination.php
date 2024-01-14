<div class="flex justify-around mt-7">
                        <nav aria-label="Page navigation example">
                            <ul class="list-style-none flex">
                              <!-- <li>
                                <a
                                  class="relative block rounded-full bg-transparent px-3 py-1.5 text-sm text-D1408C transition-all duration-300 hover:bg-active_mes"
                                  href="?page=1" >First</a
                                >
                              </li> -->
                              <?php if($page < $total): ?>
                                <li>
                                <a
                                  class="relative block rounded-full bg-transparent px-3 py-1.5 text-sm text-D1408C transition-all duration-300 hover:bg-active_mes"
                                  href="?page=<?php echo $page - 1 ?>"
                                  >Назад</a
                                >
                              </li>
                                <?php endif; ?>

                              <?php if($page > 1): ?>
                                <li>
                                <a
                                  class="relative block rounded-full bg-transparent px-3 py-1.5 text-sm text-D1408C transition-all duration-300 hover:bg-active_mes"
                                  href="?page=<?php echo $page - 1 ?>"
                                  >Следующая</a
                                >
                              </li>
                                <?php endif; ?>

                                <?php if($page < $total): ?>
                                <li>
                                <a
                                  class="relative block rounded-full bg-transparent px-3 py-1.5 text-sm text-D1408C transition-all duration-300 hover:bg-active_mes"
                                  href="?page=<?php echo $page + 1 ?>"
                                  >Next</a
                                >
                              </li>
                                <?php endif; ?>
                            
                              <!-- <li>
                                <a
                                  class="relative block rounded-full bg-transparent px-3 py-1.5 text-sm text-D1408C transition-all duration-300 hover:bg-active_mes"
                                  href="?page=<?php echo $total ?>"
                                  >Last</a
                                >
                              </li> -->
                            </ul>
                          </nav> 
                    </div>