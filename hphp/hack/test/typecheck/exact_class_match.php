<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

function testit(Super $tf, Sub $s):void {
  // This works
  // bar<Super>(async (C<Super> $step) ==> new Super());
  // This does not, with unresolved_as_union, because Hack infers `Sub` for Tv
  // Then C<Sub> does not unify with C<Sub>
  bar(async (C<Super> $step) ==> $s);
}

function bar<Tv>((function (C<Tv>): Awaitable<Tv>) $f): Tv {
  //UNSAFE
}

final class C<Tv> {
}

class Super {
}

class Sub extends Super { }
