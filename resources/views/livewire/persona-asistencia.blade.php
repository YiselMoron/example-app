<div class="p-4 m-2 border-green-300 border-opacity-50 bg-white rounded-md shadow-2xl">

    <form wire:submit.prevent="save">
        <div class="flex justify-center pb-3" >
            <div class="flex">
                <h1 class="text-gray-600 mt-4 font-bold md:text-2xl
                text-xl">Asistencia Técnica</h1>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4">
            <div x-data="app()" x-cloak>

                <div class="flex-1">
                    <textarea x-model="mensajeText"  name="VAerror" id="VAerror" wire:model="VAerror"
                      class="mb-2 bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-white border
                      border-transparent rounded-lg py-2 px-4 block w-full appearance-none leading-normal
                       placeholder-gray-700"
                      :class="{'border border-red-500': tweetIsOutOfRange() && mensajeText.length != 0 }"
                      rows="3"
                      placeholder="Qué pasó..." maxlength="200"></textarea>

                      <div class="flex justify-between items-center">

                        <div>
                          <span :class="{ 'text-red-600': charactersRemaining() <= 20 && charactersRemaining() >
                               10, 'text-red-400': charactersRemaining() <= 10 }" class="mr-3 text-sm text-gray-600"
                                x-text="charactersRemaining()"></span>
                        </div>
                      </div>
                </div>
                <script>
                    const MAX_TWEET_LENGTH = 200;

                    function app() {
                      return {
                        mensajeText: '',

                        charactersRemaining() {
                          return MAX_TWEET_LENGTH - this.mensajeText.length;
                        },

                        tweetIsOutOfRange() {
                          return (MAX_TWEET_LENGTH - this.mensajeText.length) == MAX_TWEET_LENGTH || (MAX_TWEET_LENGTH - this.mensajeText.length) < 0;
                        },

                      }
                    }
                  </script>
            </div>
        </div>

        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button type="button" onclick="document.getElementById('modal-asistencia').close()" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
            <button type="submit" class='w-auto bg-purple-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Enviar</button>
        </div>
    </form>
</div>
